<?php namespace Hampel\SortWarnings\XF\ControllerPlugin;

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
				$warnIds = [];

				foreach ($warnings as $warning)
				{
					$warnIds[$warning->getEntityId()] = $warning->title->render();
				}

				natcasesort($warnIds);

				$reply->setParam('warnings', $warnings->sortByList(array_keys($warnIds)));
			}
		}

		return $reply;
	}
}
