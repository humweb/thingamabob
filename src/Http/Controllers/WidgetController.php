<?php

namespace Humweb\Thingamabob\Http\Controllers;

use Humweb\Thingamabob\Contracts\WidgetManager;
use Humweb\Thingamabob\Exceptions\WidgetNotFound;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WidgetController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param  Request        $request
     * @param  WidgetManager  $manager
     * @param                 $widget
     *
     * @return
     */
    public function show(Request $request, WidgetManager $manager, $widget)
    {
        try {
            return $manager->get($widget)->data($request);
        } catch (WidgetNotFound $e) {
            return [
                'status'  => 'error',
                'message' => 'Widget not found!'
            ];
        }
    }

    /**
     * @param  WidgetManager  $manager
     *
     * @return
     */
    public function widgetList(WidgetManager $manager)
    {
        return $manager->all();
    }


}