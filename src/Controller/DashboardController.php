<?php


namespace App\Controller;

use Pd\WidgetBundle\Widget\WidgetInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * Dashboard Index.
     *
     * @Route(name="admin_dashboard", path="/")
     * @IsGranted("ROLE_DASHBOARD_PANEL")
     */
    public function index(): Response
    {
        // Render Page
        return $this->render('Admin/dashboard.html.twig');
    }

    /**
     * Change Language for Session.
     *
     * @Route(name="admin_language", path="/language/{lang}")
     */
    public function changeLanguage(Request $request, WidgetInterface $widget, string $lang): RedirectResponse
    {
        // Set Language for Session
        $request->getSession()->set('_locale', $lang);

        // Flush Widget Cache
        $widget->clearWidgetCache();

        // Return Back
        return $this->redirect($request->headers->get('referer', $this->generateUrl('admin_dashboard')));
    }
}
