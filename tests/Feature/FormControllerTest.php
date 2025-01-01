<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\Enrollment;
use App\Models\LearnerSenior;
use App\Models\ParentInformation;
use App\Models\PersonalInformation;
use App\Models\ReturningLearner;
use App\Models\SpecialNeed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_stores_enrollment_data_correctly()
    {
        $this->withoutExceptionHandling();

        $personalInformation = PersonalInformation::factory()->create();
        $address = Address::factory()->create();
        $parentInformation = ParentInformation::factory()->create();
        $specialNeed = SpecialNeed::factory()->create();
        $returningLearner = ReturningLearner::factory()->create();
        $learnerSenior = LearnerSenior::factory()->create();

        $data = [
            'school_year' => '2023-2024',
            'learners_reference_no' => '123456789012',
            'grade_to_enroll' => 'Grade 10',
            'personal_information_id' => $personalInformation->id,
            'address_id' => $address->id,
            'parent_information_id' => $parentInformation->id,
            'special_need_id' => $specialNeed->id,
            'returning_learner_id' => $returningLearner->id,
            'learners_senior_id' => $learnerSenior->id,
            'distance_learning_preference' => 'Online',
        ];

        $response = $this->post(route('form.store'), $data);

        $this->assertDatabaseHas('enrollments', [
            'school_year' => '2023-2024',
            'learners_reference_no' => '123456789012',
            'grade_to_enroll' => 'Grade 10',
        ]);

        $this->assertDatabaseHas('personal_information', [
            'id' => $personalInformation->id,
        ]);

        $this->assertDatabaseHas('addresses', [
            'id' => $address->id,
        ]);

        $this->assertDatabaseHas('parent_information', [
            'id' => $parentInformation->id,
        ]);

        $this->assertDatabaseHas('special_needs', [
            'id' => $specialNeed->id,
        ]);

        $this->assertDatabaseHas('learner_seniors', [
            'id' => $learnerSenior->id,
        ]);

        $this->assertDatabaseHas('returning_learners', [
            'id' => $returningLearner->id,
        ]);
    }
}
