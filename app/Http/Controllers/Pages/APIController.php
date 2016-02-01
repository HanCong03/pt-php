<?php
/**
 * Created by IntelliJ IDEA.
 * User: hancong
 * Date: 16/1/30
 * Time: 上午1:20
 */

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Log;

class APIController extends Controller {
    private $apis;

    public function __construct() {
        $apis = json_decode(file_get_contents(dirname(__FILE__) . '/api.json'), true);
        $this->apis = $apis;

        view()->share('apis', $apis);
        view()->share('navName', 'API库');
    }

    public function index() {
        return view('document/api/index');
    }

    public function classify($classifyName) {
        $apis = $this->apis;

        foreach ($apis as $api) {
            foreach ($api['children'] as $sub) {
                if ($classifyName === $sub['classify']) {
                    $current = $sub;
                    $menu = $api['name'];
                    break;
                }
            }
        }

        if (!isset($current)) {
            return abort(404);
        }

        return view('document/api/classify', [
            'current' => $current,
            'menu' => $menu
        ]);
    }

    public function detail($classifyName, $apiName) {
        if (!isset($classifyName) || !isset($apiName)) {
            return abort(404);
        }

        $apiName = str_replace('.', '/', $apiName);

        if (!preg_grep('/^[^\/]+\/[^\/]+(\/[^\/]+)?$/', [$apiName])) {
            return abort(404);
        }

        $apis = $this->apis;

        foreach ($apis as $api) {
            foreach ($api['children'] as $child) {
                if ($child['classify'] === $classifyName) {
                    $menu = $api['name'];
                    $subMenu = $child['name'];
                    $classify = $child;
                    break;
                }
            }
        }

        if (!isset($classify)) {
            return abort(404);
        }

        foreach ($classify['children'] as $apiLevel1) {
            foreach ($apiLevel1['children'] as $apiLevel2) {
                if ($apiLevel2['name'] === $apiName) {
                    $currentApi = $apiLevel2;
                    break;
                }
            }
        }

        if (!isset($currentApi)) {
            return abort(404);
        }

        return view('document/api/detail', [
            'menu' => $menu,
            'subMenu' => $subMenu,
            'currentApi' => $currentApi,
            'currentDetail' => $currentApi['detail']
        ]);
    }
}