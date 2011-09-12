<?php

/**
 * user actions.
 *
 * @package    simpleTwitter
 * @subpackage user
 * @author     Cristobal Viedma
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->simpletwitter_users = Doctrine_Core::getTable('simpletwitterUser')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->simpletwitter_user = Doctrine_Core::getTable('simpletwitterUser')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->simpletwitter_user);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new simpletwitterUserForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new simpletwitterUserForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($simpletwitter_user = Doctrine_Core::getTable('simpletwitterUser')->find(array($request->getParameter('id'))), sprintf('Object simpletwitter_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new simpletwitterUserForm($simpletwitter_user);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($simpletwitter_user = Doctrine_Core::getTable('simpletwitterUser')->find(array($request->getParameter('id'))), sprintf('Object simpletwitter_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new simpletwitterUserForm($simpletwitter_user);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($simpletwitter_user = Doctrine_Core::getTable('simpletwitterUser')->find(array($request->getParameter('id'))), sprintf('Object simpletwitter_user does not exist (%s).', $request->getParameter('id')));
    $simpletwitter_user->delete();

    $this->redirect('user/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $simpletwitter_user = $form->save();

      $this->redirect('user/edit?id='.$simpletwitter_user->getId());
    }
  }
}
