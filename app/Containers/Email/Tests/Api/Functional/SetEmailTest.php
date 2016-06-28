<?php

namespace App\Containers\Email\Tests\Api\Functional;

use App\Kernel\Tests\PHPUnit\Abstracts\TestCase;

/**
 * Class SetEmailTest.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class SetEmailTest extends TestCase
{

    private $endpoint = '/users/{id}/email';

    public function testSetUserEmail_()
    {
        $userDetails = [
            'name' => 'Mahmoud Zalt',
        ];

        // get the logged in user (create one if no one is logged in)
        $user = $this->registerAndLoginTestingUser($userDetails);

        $data = [
            'email' => 'mahmoudz.me@gmail.com',
        ];

        $this->endpoint = str_replace("{id}", $user->id, $this->endpoint);

        // send the HTTP request
        $response = $this->apiCall($this->endpoint, 'post', $data, true);

        // assert response status is correct
        $this->assertEquals($response->getStatusCode(), '202');

    }

}
