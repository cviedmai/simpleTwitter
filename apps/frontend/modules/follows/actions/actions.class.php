<?php

/**
 * follows actions.
 *
 * @package    simpleTwitter
 * @subpackage follows
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class followsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->simpletwitter_followss = Doctrine_Core::getTable('simpletwitterFollows')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->simpletwitter_follows = Doctrine_Core::getTable('simpletwitterFollows')->find(array($request->getParameter('follower_id'),
                        $request->getParameter('followed_id')));
    $this->forward404Unless($this->simpletwitter_follows);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new simpletwitterFollowsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new simpletwitterFollowsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($simpletwitter_follows = Doctrine_Core::getTable('simpletwitterFollows')->find(array($request->getParameter('follower_id'),
  $request->getParameter('followed_id'))), sprintf('Object simpletwitter_follows does not exist (%s).', $request->getParameter('follower_id'),
  $request->getParameter('followed_id')));
    $this->form = new simpletwitterFollowsForm($simpletwitter_follows);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($simpletwitter_follows = Doctrine_Core::getTable('simpletwitterFollows')->find(array($request->getParameter('follower_id'),
  $request->getParameter('followed_id'))), sprintf('Object simpletwitter_follows does not exist (%s).', $request->getParameter('follower_id'),
  $request->getParameter('followed_id')));
    $this->form = new simpletwitterFollowsForm($simpletwitter_follows);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($simpletwitter_follows = Doctrine_Core::getTable('simpletwitterFollows')->find(array($request->getParameter('follower_id'),
  $request->getParameter('followed_id'))), sprintf('Object simpletwitter_follows does not exist (%s).', $request->getParameter('follower_id'),
  $request->getParameter('followed_id')));
    $simpletwitter_follows->delete();

    $this->redirect('follows/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $simpletwitter_follows = $form->save();

      $this->redirect('follows/edit?follower_id='.$simpletwitter_follows->getFollowerId().'&followed_id='.$simpletwitter_follows->getFollowedId());
    }
  }
}
