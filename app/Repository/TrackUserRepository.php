<?php


namespace App\Repository;

use App\Models\Session;
use Illuminate\Support\Facades\DB;

class TrackUserRepository
{
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function create($data)
    {
        return $this->session->create($data);
    }

    public function get()
    {
        return $this->session->get();
    }

    public function getIp()
    {
        return $this->session->select('ip')->get();
    }

    public function getIpCount()
    {
        return $this->session->select('ip')->count();
    }

    public function getIpDistinct()
    {
        return $this->session->select('ip')->distinct()->get();
    }

    public function getIpDistinctCount()
    {
        return $this->session->select('ip')->distinct()->count();
    }

    public function getIpDistinctCountGroupByIp()
    {
        return $this->session->select('ip')->distinct()->count('ip');
    }

    public function getIpDistinctCountGroupByIpAndUserAgent()
    {
        return $this->session->select('ip')->distinct()->count('ip', 'user_agent');
    }

    public function getIpDistinctCountGroupByIpAndUserAgentAndRoute()
    {
        return $this->session->select('ip')->distinct()->count('ip', 'user_agent', 'route');
    }

    public function getIpDistinctCountGroupByIpAndUserAgentAndRouteAndTime()
    {
        return $this->session->select('ip')->distinct()->count('ip', 'user_agent', 'route', 'time');
    }

    public function getIpDistinctCountGroupByIpAndUserAgentAndRouteAndTimeAndUserId()
    {
        return $this->session->select('ip')->distinct()->count('ip', 'user_agent', 'route', 'time', 'user_id');
    }

    public function getIpDistinctCountGroupByIpAndUserAgentAndRouteAndTimeAndUserIdAndId()
    {
        return $this->session->select('ip')->distinct()->count('ip', 'user_agent', 'route', 'time', 'user_id', 'id');
    }

    public function getIpDistinctCountGroupByIpAndUserAgentAndRouteAndTimeAndUserIdAndIdAndCreatedAt()
    {
        return $this->session->select('ip')->distinct()->count('ip', 'user_agent', 'route', 'time', 'user_id', 'id', 'created_at');
    }
}