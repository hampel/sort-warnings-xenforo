<?php namespace Hampel\SortWarnings\XF\Admin\Controller;

use Hampel\SortWarnings\Helper\Warnings;
use XF\Mvc\ParameterBag;

class Warning extends XFCP_Warning
{
	public function actionIndex(ParameterBag $params)
	{
		$reply = parent::actionIndex($params);

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
