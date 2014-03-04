<?php

namespace Afup\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

abstract class CrudController extends Controller
{
    /**
     * Get the role prefix for all specialized roles.
     *
     * @return string
     */
    abstract protected function getRolePrefix();

    /**
     * Get the route prefix for all CRUD routes.
     *
     * @return string
     */
    abstract protected function getRoutePrefix();

    /**
     * Get the data to be presented to the list
     *
     * @return array|Traversable
     */
    abstract protected function getListData();

    /**
     * Get the form type used for edition and creation
     *
     * @return string|Symfony\Component\Form\FormTypeInterface
     */
    abstract protected function getFormType();

    /**
     * Get the entity name for this controller.
     *
     * @return string
     */
    abstract protected function getEntityName();

    /**
     * Base list action
     *
     * @param  Request $request
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $this->checkGranted('list');

        return $this->render(
            $this->guessTemplate('listAction', $request),
            array(
                'list' => $this->getListData()
            )
        );
    }

    /**
     * Base edition action
     *
     * @param  Request $request
     * @param  mixed   $id
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request)
    {
        $this->checkGranted('list');

        $entity = $this->findEntityOr404($request);

        $form =$this->get('form.factory')->create($this->getFormType(), $entity, array(
            'validation_groups' => array('edition'),
        ));

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->checkGranted('edit');

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Your changes were saved!'
            );

            $redirectTo = $this->get('router')->generate($this->getRoute('edit'), ['id' => $entity->getId()]);

            return new RedirectResponse($redirectTo, 301);
        }

        return $this->render($this->guessTemplate('editAction', $request), [
            'entity' => $entity,
            'form'   => $form->createView()
        ]);
    }

    public function deleteAction($id)
    {
        $this->findEntityOr404($id);
    }

    /**
     * Check the user permission for the given $action.
     *
     * @param string $action
     *
     * @throws Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    protected function checkGranted($action)
    {
        if (false === $this->get('security.context')->isGranted($this->getRequiredRole($action))) {
            throw new AccessDeniedException();
        }
    }

    /**
     * Get the required role for a particular action
     *
     * @param  string $action
     * @return string
     */
    protected function getRequiredRole($action)
    {
        return $this->getRolePrefix().strtoupper($action);
    }

    /**
     * Get the route name for a particular action
     *
     * @param  string $action
     * @return string
     */
    protected function getRoute($action)
    {
        return $this->getRoutePrefix().strtolower($action);
    }

    /**
     * Guess the template to use for a given method of the current controller
     *
     * @param  string  $method
     * @param  Request $request [description]
     * @return string
     */
    protected function guessTemplate($method, Request $request)
    {
        return $this->get('sensio_framework_extra.view.guesser')->guessTemplateName(array($this, $method), $request);
    }

    /**
     * Retreive the entity based on the Request.
     *
     * The default implementation try to fetch the entity
     * from an 'id' attribute in the route pattern.
     *
     * @return mixed null if no entity was found, the entity otherwise.
     */
    protected function findEntity(Request $request)
    {
        $id = $request->attributes->get('id');

        return $this
            ->get('doctrine.orm.entity_manager')
            ->find($this->getEntityName(), $id)
        ;
    }

    /**
     * Return the entity or throw a 404 exception if none was found
     *
     * @param  Request $request
     *
     * @return mixed
     */
    protected function findEntityOr404(Request $request)
    {
        $entity = $this->findEntity($request);

        if (null === $entity) {
            $id = $request->attributes->get('id');

            throw $this->createNotFoundException(sprintf(
                "The identifier '%s' was not found in the %s repository",
                $id,
                $this->getEntityName()
            ));
        }

        return $entity;
    }
}
