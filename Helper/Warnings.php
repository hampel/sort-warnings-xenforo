<?php namespace Hampel\SortWarnings\Helper;

use XF\Mvc\Entity\ArrayCollection;

class Warnings
{
	public static function sortWarnings(ArrayCollection $warnings)
	{
		$warnIds = [];

		foreach ($warnings as $warning)
		{
			$warnIds[$warning->getEntityId()] = $warning->title->render();
		}

		natcasesort($warnIds);

		return $warnings->sortByList(array_keys($warnIds));
	}
}
