<?php

/**
 * message actions.
 *
 * @package    simpleTwitter
 * @subpackage message
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class messageActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->simpletwitter_messages = Doctrine_Core::getTable('simpletwitterMessage')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->simpletwitter_message = Doctrine_Core::getTable('simpletwitterMessage')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->simpletwitter_message);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new simpletwitterMessageForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new simpletwitterMessageForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($simpletwitter_message = Doctrine_Core::getTable('simpletwitterMessage')->find(array($request->getParameter('id'))), sprintf('Object simpletwitter_message does not exist (%s).', $request->getParameter('id')));
    $this->form = new simpletwitterMessageForm($simpletwitter_message);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($simpletwitter_message = Doctrine_Core::getTable('simpletwitterMessage')->find(array($request->getParameter('id'))), sprintf('Object simpletwitter_message does not exist (%s).', $request->getParameter('id')));
    $this->form = new simpletwitterMessageForm($simpletwitter_message);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($simpletwitter_message = Doctrine_Core::getTable('simpletwitterMessage')->find(array($request->getParameter('id'))), sprintf('Object simpletwitter_message does not exist (%s).', $request->getParameter('id')));
    $simpletwitter_message->delete();

    $this->redirect('message/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $simpletwitter_message = $form->save();

      $this->redirect('message/edit?id='.$simpletwitter_message->getId());
    }
  }
}
