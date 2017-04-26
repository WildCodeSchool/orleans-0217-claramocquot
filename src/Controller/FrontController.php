<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 14/04/17
 * Time: 19:41
 */

namespace Clara\Controller;

use Clara\Controller\MailController;
use Clara\Model\ContentManager;
use Clara\Model\HatManager;
use Clara\Model\PictureHomeManager;
use Clara\Model\Visibility_marraineManager;

require __DIR__ . '/../../vendor/swiftmailer/swiftmailer/lib/swift_required.php';
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use WindowsAzure\ServiceManagement\Models\Location;


class FrontController extends Controller
{
    public function homeContent()
    {
        $em = new ContentManager();
        $em2 = new HatManager();
        $em3 = new PictureHomeManager();
        $lastEvenement = $em->findLastType('evenement');
        $lastBlog = $em->findLastType('blog');
        $lastPortrait = $em->findLastType('portrait');
        $newHats = $em2->showNewHats();
        $picture = $em3->findPictureHome();
        $msg = new MailController(true);
        if (isset($_POST['submitcontact'])) {
            $msg->contact($_POST);
            header('Location:index.php');
        }
        return $this->getTwig()->render('home.html.twig', ['evenement' => $lastEvenement, 'blog' => $lastBlog, 'portrait' => $lastPortrait, 'news' => $newHats, 'picture' => $picture]);

    }

    /**
     * @param $id
     * @return string
     */
    public function showContent($id)
    {
        $db = new ContentManager();
        $res = $db->findOne($id);
        return $this->getTwig()->render('content.html.twig', ['data' => $res]);
    }

    public function showContents($type)
    {
        $msg = new MailController(true);
        $db = new ContentManager();
        $em = new Visibility_marraineManager();
        $visibility = $em->showVisibility();
        $res = $db->findAll($type);

        if (isset($_POST['submitcontact'])) {
            $msg->contact($_POST);
            header('Location:index.php?route=articles&type=' . $type);

        }
        if (isset($_POST['submitmarraine'])) {
            $msg->contactMarraine($_POST);
            header('Location:index.php?route=articles&type=' . $type);
        }

        if (isset($_POST['submittemoignage'])) {
            $msg->contactTemoignage($_POST);
            header('Location:index.php?route=articles&type=' . $type);
        }

        if (isset($_POST['submitpartenaire'])) {
            $msg->contactPartenaire($_POST);
            header('Location:index.php?route=articles&type=' . $type);
        }

        return $this->getTwig()->render('contents.html.twig', ['datas' => $res, 'type' => $type, 'visibility' => $visibility]);
    }

    public function showHats()
    {
        $msg = new MailController(true);
        $em = new HatManager();
        $datas = $em->showHats();
        $oldHats = $em->showOldHats();

        if (isset($_POST['submitproduit'])) {
            $msg->contactProduct($_POST);
            header('Location:index.php?route=produits');
        }

        return $this->getTwig()->render('products.html.twig', ['datas' => $datas, 'olds' => $oldHats]);
    }

    public function showHat($id)
    {
        $msg = new MailController(true);
        $db = new HatManager();
        $res = $db->showHat($id);
        if (isset($_POST['submitproduit'])) {
            $msg->contactProduct($_POST);
            header('Location:index.php?route=produit&id=' . $id);

        }
        if (isset($_POST['submitcontact'])) {
            $msg->contact($_POST);
            header('Location:index.php?route=produit&id=' . $id);

        }
        return $this->getTwig()->render('product.html.twig', ['hats' => $res]);
    }


}