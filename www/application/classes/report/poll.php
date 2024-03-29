<?php
/**
 * Open Labyrinth [ http://www.openlabyrinth.ca ]
 *
 * Open Labyrinth is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Open Labyrinth is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Open Labyrinth.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright Copyright 2012 Open Labyrinth. All Rights Reserved.
 *
 */
defined('SYSPATH') or die('Không có quyền truy cập tập lệnh trực tiếp.');

/**
 * Class 4R Report
 */
class Report_Poll extends Report
{
    private $maps;
    private $name;
    private $countOfChoices;
    private $mapElements;

    /**
     * Default constructor
     *
     * @param Report_Impl $impl - report class implementation
     * @param string $name - report name
     */
    public function __construct(Report_Impl $impl, $name)
    {
        parent::__construct($impl);

        $this->maps = array();
        $this->countOfChoices = 4;
        $this->name = $name;
        $this->mapElements = array();
    }

    /**
     * Add map for report
     *
     * @param integer $mapId - map ID
     * @param integer $webinarId - webinar ID
     * @param integer $webinarStep - webinar step
     */
    public function add($mapId, $webinarId = null, $webinarStep = null, $dateStatistics = null)
    {
        if ($mapId == null || $mapId <= 0) {
            return;
        }

        $this->maps[] = array(
            'mapId' => $mapId,
            'webinarId' => $webinarId,
            'webinarStep' => $webinarStep,
            'dateStatistics' => $dateStatistics
        );
    }

    /**
     * Generate report
     *
     * @return mixed
     */
    public function generate($latest = true, $date_from = null, $date_to = null)
    {
        if ($this->implementation == null || $this->maps == null || count($this->maps) <= 0) {
            return;
        }

        $this->implementation->setCreator('OpenLabyrinth System');
        $this->implementation->setLastModifiedBy('OpenLabyrinth System');
        $this->implementation->setTitle('Multi Report');
        $this->implementation->setSubject('Multi Statistic');
        $this->implementation->setDescription('Multi Statistic');
        $this->implementation->setKeywords('Multi, Multi Report, Report');
        $this->implementation->setCategory('Report');
        $this->implementation->setActiveSheet(0);

        foreach ($this->maps as $mapData) {
            $this->mapElements[] = new Report_Poll_Map(
                $this->implementation,
                $mapData['mapId'],
                $this->countOfChoices,
                $mapData['webinarId'],
                $mapData['webinarStep'],
                $mapData['dateStatistics'],
                $latest,
                $date_from,
                $date_to
            );
        }
    }

    /**
     * Get report
     *
     * @return mixed
     */
    public function get($save_to_file = false)
    {
        if ($this->implementation == null) {
            return;
        }

        if ($this->mapElements != null && count($this->mapElements) > 0) {
            $currentOffset = 1;
            foreach ($this->mapElements as $mapElement) {
                $currentOffset += $mapElement->insert($currentOffset, $this->name, $save_to_file);
            }
        }

        $this->implementation->download($this->name, $save_to_file);

        if ($save_to_file) {
            Controller_WebinarManager::saveReportProgress($this->name, true);
        }
    }
}