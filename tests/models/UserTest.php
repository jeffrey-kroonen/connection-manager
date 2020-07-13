<?php

    use PHPUnit\Framework\TestCase;
    use ConnectionManager\Src\Model\User;

    class UserTest extends TestCase
    {

        protected $user;

        public function setUp() : void
        {
            $data = [
                "id" => 1,
                "role_id" => 1,
                "first_name" => "John",
                "last_name" => "Doe",
                "email" => "johndoe@test.com",
                "password" => "Password123@",
                "last_login" => "2020-01-01 12:00:00",
                "created_at" => "2020-01-01 11:00:00",
                "updated_at" => "2020-01-01 10:00:00"
            ];

            $this->user = new User($data);
        }

        public function testConstructorSetProperties()
        {
            $this->assertEquals(1, $this->user->id);
            $this->assertEquals(1, $this->user->role_id);
            $this->assertEquals("John", $this->user->first_name);
            $this->assertEquals("Doe", $this->user->last_name);
            $this->assertEquals("johndoe@test.com", $this->user->email);
            $this->assertEquals("Password123@", $this->user->password);
            $this->assertEquals("2020-01-01 12:00:00", $this->user->last_login);
            $this->assertEquals("2020-01-01 11:00:00", $this->user->created_at);
            $this->assertEquals("2020-01-01 10:00:00", $this->user->updated_at);
        }

        public function testMethodFindOnModelReturningNull()
        {
            $user = User::find("abcd");

            $this->assertNull($user);
        }

        public function testSetFullName()
        {
            $this->assertEquals("John Doe", $this->user->full_name);
        }

        public function testGeneratingPasswordReturningString()
        {
            $this->assertIsString($this->user->generatePassword());
        }

        public function testAuthVerifyLength()
        {
            $string = "john";

            $this->assertTrue($this->user->verifyLength($string, 3, 15));
        }

        public function testCanUserLogin()
        {
            $this->assertNull($this->user->login());
        }
    }