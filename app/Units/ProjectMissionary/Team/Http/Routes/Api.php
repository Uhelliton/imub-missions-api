<?php

namespace IGestao\Units\ProjectMissionary\Team\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
            $this->router->get('/missions/teams/{id}/members/associate', 'TeamMemberController@getTeamMembers');
        $this->router->post('/missions/teams/members/associate', 'TeamMemberController@store');
        $this->router->get('/missions/teams/members/simplified', 'MemberController@getMembersCollectionSimplified');

        $this->router->apiResource('/missions/teams/members', 'MemberController');
        $this->router->apiResource('/missions/teams', 'TeamController');


    }
}