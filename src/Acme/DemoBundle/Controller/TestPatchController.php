<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bumz
 * Date: 6/4/13
 * Time: 7:05 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\DemoBundle\Controller;

use Acme\DemoBundle\Form\PatchType;
use Acme\DemoBundle\Model\Item;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TestPatchController extends Controller
{
    public function testPatchAction()
    {
        // assume we fetched entity/document from storage
        $item = new Item();
        $item->setId(2);
        $item->setName('pre-test name');
        $item->setComment('pre-test comment');

        // assume we got a patch with data and encoded json/xml whatever
        $array = array(
            'name' => 'test name patch',
        );

        $form = $this->createForm(new PatchType(), $item);
        $form->submit($array, true);

        // this form is *always* invalid, as 'id' and 'comment' fields never submitted
        if ($form->isValid()) {
            return new Response('ok');
        }

        return new Response('not ok');
    }
}