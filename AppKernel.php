<?php
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Created by PhpStorm.
 * User: eng
 * Date: 04/08/2016
 * Time: 10:17
 */
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \AppBundle\AppBundle()
        );

        if ($this->getEnvironment() == 'dev') {
            $bundles[] = new \Symfony\Bundle\DebugBundle\DebugBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config.yml');
    }

}