<?php

class AdminTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}
	//下面测试一个实例
	pubic function getUsers(){
		//下面测试我们的数据
		$user = User::where('username','=','test')->get();
   

	}



}
