<?php

namespace Afup\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function listAction()
    {
        $users = $this
            ->get('doctrine')
            ->getRepository('Afup\CoreBundle\Entity\User')
            ->findUserList()
        ;

        return $this->render('AfupAdminBundle:User:list.html.twig', [
            'users' => $users
        ]);
    }

    public function editAction(Request $request, $id)
    {
        $user = $this
            ->get('doctrine')
            ->getRepository('Afup\CoreBundle\Entity\User')
            ->find($id)
        ;

        if (null === $user) {
            throw $this->createNotFoundException(printf('User #%d does not exist.', $id));
        }

        $form = $this->createFormBuilder($user)
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('submit', 'submit')
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($user);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Your changes were saved!'
            );

            return $this->redirect($this->generateUrl('afup_admin_user_edit', ['id' => $user->getId()]));
        }

        return $this->render('AfupAdminBundle:User:edit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }
}
