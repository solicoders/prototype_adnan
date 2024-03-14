<?php

namespace Tests\Feature\UserTest;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\repositories\StagiaireRepository\StagiaireRepository;



class UserTest extends TestCase
{
    

    use DatabaseTransactions;
    protected $userRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = app(StagiaireRepository::class);
    }


    public function test_Get_All_Users()
    {
        // Create test data
        $User1 = User::create([
            'name' => 'Chef de projet',
            'email' => 'projectleader1234@solicode.com',
            'password' => Hash::make('projectleade4'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    
       ]);
       $User2 = User::create([
            
        'name' => 'Chef de',
        'email' => 'projectleader123@solicode.com',
        'password' => Hash::make('projectleader1'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),

]);
$User3 = User::create([
            
    'name' => 'Chef',
    'email' => 'projectleader12@solicode.com',
    'password' => Hash::make('projectleader12'),
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
]);
        

        // Call the getAllImages method with a search query
        $userName = 'Chef';
        $result = $this->userRepository->getStagiaires($userName);

        // Assert that the result is a paginated collection
        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);

        // Assert that the paginated collection contains the correct items
        // $this->assertEquals(2, $result->count());
        $this->assertTrue($result->contains('name', 'Chef de projet'));
        $this->assertTrue($result->contains('name', 'Chef de'));
        $this->assertFalse($result->contains('name', 'Chef vdfd'));
    }





 // ================================ create image =================================
 public function test_create_user()
 {
     $inputData = [
        'name' => 'Chef 2',
        'email' => 'projectleader121@solicode.com',
        'password' => Hash::make('projectleader12'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
     ];

     // Call the create method
     $createdUser = $this->userRepository->create($inputData);

     
     $this->assertInstanceOf(User::class, $createdUser);

 
     $this->assertDatabaseHas('users', $inputData);

 }



 
    // ======================== edit function ========================

    public function test_edit_user()
    {
        // Create a test image
        $user = User::create([  

            'name' => 'stagiare 1',
            'email' => 'stagiare@solicode.com',
            'password' => Hash::make('projectleader12'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
    ]);

    
    $updatedAttributes = [
        'name' => 'Updated Name',
        'email' => 'Updated@solicode.com',
        'password' => Hash::make('projectleader12'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        
    ];


    // Call the update method
    $editedUser = $this->userRepository->update($updatedAttributes, $user->id);

       
        $this->assertInstanceOf(User::class, $editedUser);

   
        $this->assertEquals('Updated Name', $editedUser->name);
    }





    public function testDeleteImages()
    {
        // Create a test image
        $user = User::create([

            'name' => 'stagiare 1',
            'email' => 'stagiare@solicode.com',
            'password' => Hash::make('projectleader12'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        // Call the delete_images method
        $this->userRepository->destroy($user->id);

        // Assert that the image has been deleted from the database
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }




}





