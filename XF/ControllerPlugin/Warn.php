<?php namespace Hampel\SortWarnings\XF\ControllerPlugin;

use Hampel\SortWarnings\Helper\Warnings;
use XF\Mvc\Entity\Entity;

class Warn extends XFCP_Warn
{
	public function actionWarn($contentType, Entity $content, $warnUrl, array $breadcrumbs = [])
	{
		$reply = parent::actionWarn($contentType, $content, $warnUrl, $breadcrumbs);

		if ($reply instanceof \XF\Mvc\Reply\View)
		{
			if ($warnings = $reply->getParam('warnings'))
			{
				$reply->setParam('warnings', Warnings::sortWarnings($warnings));
			}
		}

		return $reply;
	}
}
