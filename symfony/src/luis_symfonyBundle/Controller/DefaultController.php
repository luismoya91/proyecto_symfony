<?php

namespace luis_symfonyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@luis_symfony/Default/index.html.twig');
    }
	
	public function inicioAction()
    {
        return $this->render('@luis_symfony/Default/inicio.html.twig');
    }
	
	public function empleadoAction()
    {
        return $this->render('@luis_symfony/Default/empleado.html.twig');
    }
	
	public function empleadorAction()
    {
        return $this->render('@luis_symfony/Default/empleador.html.twig');
    }
	
	public function reporteAction()
    {	
		$em = $this->getDoctrine()->getManager();

        $empleados = $em->getRepository('luis_symfonyBundle:Empleado')->findAll();

        return $this->render('empleado/reporte.html.twig', array(
            'empleados' => $empleados,
			));
 
		
        //return $this->render('@luis_symfony/Default/reporte.html.twig');
    }
}
