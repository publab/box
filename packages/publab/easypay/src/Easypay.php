<?php
/**
 * Created by PhpStorm.
 * User: 89340
 * Date: 2019/12/10
 * Time: 9:39
 */

namespace Publab\Easypay;

use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;

class Easypay
{
    /**
     * @var SessionManager
     */
    protected $session;

    /**
     * @var Repository
     */
    protected $config;

    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }

    /**
     * @param string $msg
     * @return string
     */
    public function test_rtn($msg = ''){
//        return $this->config->get('easypay.options');
        return $msg.' <strong>from your custom develop package!</strong>>';
    }
}
