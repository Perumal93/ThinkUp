<?php
/**
 *
 * ThinkUp/webapp/_lib/model/interface.InsightDAO.php
 *
 * Copyright (c) 2012-2016 Gina Trapani
 *
 * LICENSE:
 *
 * This file is part of ThinkUp (http://thinkup.com).
 *
 * ThinkUp is free software: you can redistribute it and/or modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any
 * later version.
 *
 * ThinkUp is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with ThinkUp.  If not, see
 * <http://www.gnu.org/licenses/>.
 *
 * Insight Data Access Object
 *
 * @license http://www.gnu.org/licenses/gpl.html
 * @copyright 2012-2016 Gina Trapani
 * @author Gina Trapani <ginatrapani[at]gmail[dot]com>
 */
interface InsightDAO {
    /**
     * Insert insight into storage. (Deprecated for insight redesign.)
     * @param str $slug
     * @param int $instance_id
     * @param str $date
     * @param str $prefix
     * @param str $text
     * @param str $filename
     * @param int $emphasis
     * @param str $related_data Defaults to null
     * @return bool
     */
    public function insertInsightDeprecated($slug, $instance_id, $date, $prefix, $text, $filename,
    $emphasis=Insight::EMPHASIS_LOW, $related_data=null);
    /**
     * Insert insight into storage.
     * @param Insight $insight
     * @return bool
     * @throws InsightFieldNotSetException
     */
    public function insertInsight(Insight $insight);
    /**
     * Retrieve insight from storage.
     * @param str $slug
     * @param int $instance_id
     * @param str $date
     * @return Insight
     */
    public function getInsight($slug, $instance_id, $date);
    /**
     * Retrieve insight from storage by username and network.
     * @param str $network_username
     * @param str $network
     * @param str $slug
     * @param str $date
     * @return Insight
     */
    public function getInsightByUsername($network_username, $network, $slug, $date);
    /**
     * Retrieve insight's related data from storage.
     * @param str $slug
     * @param int $instance_id
     * @param str $date
     * @return Insight
     */
    public function getPreCachedInsightData($slug, $instance_id, $date);
    /**
     * Remove insight from storage.
     * @param str $slug
     * @param int $instance_id
     * @param str $date
     * @return bool
     */
    public function deleteInsight($slug, $instance_id, $date);
    /**
     * Remove insights for an instance by slug from storage.
     * @param str $slug
     * @param int $instance_id
     * @return bool
     */
    public function deleteInsightsBySlug($slug, $instance_id);
    /**
     * Get a page of insights for an instance.
     * @param int $instance_id
     * @param int $page_count Number of insight baselines to return
     * @param int $page_number Page number
     * @return array Insights
     */
    public function getInsights($instance_id, $page_count=10, $page_number=1);
    /**
     * Update insight in storage.
     * @param str $slug
     * @param int $instance_id
     * @param int $date;
     * @param str $prefix
     * @param str $text
     * @param int $emphasis
     * @param str $related_data Defaults to null.
     * @return bool
     */
    public function updateInsightDeprecated($slug, $instance_id, $date, $prefix, $text, $emphasis=Insight::EMPHASIS_LOW,
    $related_data=null);
    /**
     * Get a page of insights for all public users.
     * @param int $page_count Number of insight baselines to return
     * @param int $page_number Page number
     * @return array Insights
     */
    public function getPublicInsights($page_count=10, $page_number=1);
    /**
     * Get a page of end-of-year insights for all public users.
     * @param int $page_count Number of insight baselines to return
     * @param int $page_number Page number
     * @param str $since Since this date
     * @return array Insights
     */
    public function getPublicEOYInsights($page_count=10, $page_number=1, $since=null);
    /**
     * Get a page of insights for all users, public and private.
     * @param int $page_count
     * @param int $page_number
     * @return array Insights
     */
    public function getAllInstanceInsights($page_count=10, $page_number=1);
    /**
     * Get a page of end-of-year insights for all users, public and private.
     * @param int $page_count
     * @param int $page_number
     * @param str $since Since this date
     * @return array Insights
     */
    public function getAllInstanceEOYInsights($page_count=10, $page_number=1, $since=null);
    /**
     * Get a insights for all users, public and private, created since a specified timestamp.
     * @param int $since Timestamp
     * @return array Insights
     */
    public function getAllInstanceInsightsSince($since);
    /**
     * Get an owner's insights created since a specified timestamp.
     * @param int $owner_id
     * @param int $since Timestamp
     * @return array Insights
     */
    public function getAllOwnerInstanceInsightsSince($owner_id, $since);
    /**
     * Get a page of insights by instances associated with an owner.
     * @param int $owner_id
     * @param int $page_count
     * @param int $page
     * @param int $page_count_offset Default 1
     * @return array Insights
     */
    public function getAllOwnerInstanceInsights($owner_id, $page_count=20, $page=1, $page_count_offset=1);
    /**
     * Get a page of end-of-year insights by instances associated with an owner.
     * @param int $owner_id
     * @param int $page_count
     * @param int $page
     * @param int $page_count_offset Default 1
     * @param str $since Since this date
     * @return array Insights
     */
    public function getAllOwnerInstanceEOYInsights($owner_id, $page_count=20, $page=1, $page_count_offset=1,
        $since=null);
    /**
     * Check whether or not a insight exists for an instance by slug.
     * @param $slug
     * @param $instance_id
     * @return bool
     */
    public function doesInsightExist($slug, $instance_id);

    /**
     * Return the most recent insight for a given instance and slug
     * @param $slug
     * @param $instance_id
     * @return Insight
     */
    public function getMostRecentInsight($slug, $instance_id);
}
