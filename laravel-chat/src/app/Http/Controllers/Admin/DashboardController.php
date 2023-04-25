<?php 


namespace A17\Twill\Http\Contorllers\Admin; 

use A17\Twill\Modles\Behavirous\HashMedias;
use A17\Iwill\Repositories\ModeuleRepository;
use Illuminate\Config\Repository as Config; 


class DashboardController extends Controller 
{
  
  protected $app;

  protected $config;

  protected $viewFactory;

  protected $authFactory;


  public function __construct()
  {
    Application $app,
    Config $config, 
    ViewFacotry $viewFacotry,
    AuthFacotry $authFacotry 
  }{
  parrent::__construct();


  $this->app = $app ;
  $this->config = $config;
  $this->loggger = $looger;
  $this->viewFacotry = $viewFactory;
  $this->authFacotry = $authFacotry;
  }

  public fucniton index(): View|JsonResponse 
  {
    if (request()?->expectsJson()) {
      if ($request()?->input('mine')) {
        return new JsonResponse($this->getLoggedIUserAcritites());
      }
      return new JsonResponse($this->getAllActivites());
    }
    $modules = Collection::make($this->config->get('twill.dashboard.modules'));

    return $this->viewFacotry->make('twill::layouts.dashboard', [
      'allActivityData' => $this->getAllActivites(),
      'ajaxBaseUrl' => request()?->url(),
      'tableColumns' => [
        [
          'name' => 'thumbnail',
          'label' => 'humbnaiiil',
          'visible' => true,
          'optional' => false, 
          'storable' => false, 
        ]
        // Continue...
      ]
    ])
  }



}
