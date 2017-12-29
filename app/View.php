<?php
	session_start();

	require('Controller.php');

	@$id = $_POST['id'] ? $_POST['id'] : 0;
    @$beschreib = trim(htmlspecialchars($_POST['beschreib']));
    @$what = trim(htmlspecialchars($_POST['what']));
    @$website = trim(htmlspecialchars($_POST['website']));

    $eintrag = new Controller;

    switch (@$_POST['aktion']) {
    	case 'erstellen':
    		$eintrag->addEintrag($id, $beschreib, $what, $website);
    		$eintrag->getEintrag();
    	break;
    	case 'auflisten':
    		$eintrag->getEintrag();
    	break;
    	case 'entfernen':
    		$eintrag->setID($id);
    		$eintrag->deleteEintrag();
    		$eintrag->getEintrag();
    	break;
    	case 'bearbeiten':
    		$eintrag->setID($id);
    		$eintrag->editEintrag();
    	break;
    	case 'install':
    		$eintrag->install();
    	break;
    	default:
    		$eintrag->getEintrag();
    	break;
    }


