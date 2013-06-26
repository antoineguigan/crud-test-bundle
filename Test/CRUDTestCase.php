<?php
/*
 * This file is part of the Qimnet CRUD Bundle.
 *
 * (c) Antoine Guigan <aguigan@qimnet.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Qimnet\CRUDTestBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class CRUDTestCase extends WebTestCase
{
    abstract protected function getConfigName();

    protected function getUrl($client, $url="")
    {
        return $client->getContainer()->getParameter('qimnet.crud.path_prefix')  . '/' .
                $this->getConfigName() . $url;
    }
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $this->getUrl($client));
//        var_dump($client->getResponse()->getContent());exit;
        $this->assertTrue($client->getResponse()->isSuccessful(), 'index could not be open : ' . "\n" .
                $crawler->filter("title")->text());
        $this->checkLinks($client, $crawler, '.qimnet-crud-index td a');
        $this->checkLinks($client, $crawler, '.qimnet-crud-index th a');
        $this->checkLinks($client, $crawler, '.qimnet-crud-index-cell a');
        $this->checkLinks($client, $crawler, '.pages a');
    }

    protected function checkLinks($client, $crawler, $filter)
    {
        $links = $crawler->filter($filter);
        $this->assertGreaterThan(0, count($links), "Filter $filter did not contain any link");
        $uris = array();
        for ($i=0;(count($uris)<6) && ($i < count($links));$i++) {
            $link = $links->eq($i);
            if (!in_array($link->attr('href'), $uris)) {
                $uris[] = $link->attr('href');
                $resultCrawler = $client->click($link->link());

                $this->assertTrue($client->getResponse()->isSuccessful(),
                        'URL ' . $link->attr('href') . ' could not be followed :' . "\n" .
                        $resultCrawler->filter("title")->text());
            }
        }
    }
    public function getCreateData()
    {
        return array(array());
    }

    /**
     * @dataProvider getCreateData
     */
    public function testCreate(array $formData=null, array $parameters=array(), array $options=array())
    {
        if (!$formData) return;
        $client = static::createClient();
        $crawler = $client->request('GET', $this->getUrl($client, '/new'), $parameters);
        $form = $crawler->filter('form');
        $resultCrawler = $client->submit($form->form(), $formData);
        if (isset($options['failure']) && $options['failure']) {
            if ($client->getResponse()->isSuccessful()) {
                $this->assertGreaterThan(0, $resultCrawler->filter('form')->count(), 'Form did not fail');
            }
        } else {
            $this->assertTrue($client->getResponse()->isRedirect(), 'Response contained no redirection');
        }
    }
}
