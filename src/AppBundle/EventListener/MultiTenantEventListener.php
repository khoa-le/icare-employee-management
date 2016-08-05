<?php
/**
 * Created by PhpStorm.
 * User: eng
 * Date: 05/08/2016
 * Time: 08:42
 */

namespace AppBundle\EventListener;


use Doctrine\DBAL\Connection;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;

class MultiTenantEventListener
{
    private $request;
    private $connection;
    private $logger;

    public function __construct(Request $request, Connection $connection, Logger $logger) {
        $this->request = $request;
        $this->connection = $connection;
        $this->logger = $logger;
    }


    public function onKernelRequest() {

        if ($this->request->query->has('tenant')) {
            $tenant = $this->request->query->get('tenant');

            $connection = $this->connection;
            $params     = $this->connection->getParams();

            $db_name = 'icb_em_tenant_'.$this->request->query->get('tenant');

            // TODO: validate that this site exists
            if ($db_name != $params['dbname']) {
                $this->logger->debug('switching connection from '.$params['dbname'].' to '.$db_name);
                $params['dbname'] = $db_name;
                if ($connection->isConnected()) {
                    $connection->close();
                }
                $connection->__construct(
                    $params, $connection->getDriver(), $connection->getConfiguration(),
                    $connection->getEventManager()
                );

                try {
                    $connection->connect();
                } catch (Exception $e) {
                    // log and handle exception
                }
            }
        }
    }
}