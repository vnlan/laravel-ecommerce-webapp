@extends('v1.admin-views.layouts.admin-layout')

@section('v1-admin-title')
<title>Trang Test thui hihi</title>
@endsection

@section('v1-admin-js')
<script type="text/javascript" src="{{ asset('v1/resources/js/reuseable/datatable.js') }}"></script>
@endsection

@section('v1-admin-content')

<div class="container-xxl flex-grow-1 container-p-y">

    @include('v1.admin-views.partials.content-header',['pageName' => 'Trang test ý mà hihi', 'pageParent' => 'Trước trang test'])


    <div class="row">

        <!-- Button with Badges -->
        <div class="col-lg">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between my-2">
                    <div class="p-2">
                        <h5 class="card-title mb-0">DataTable with Buttons</h5>
                    </div>
                    <div class="pt-md-0">
                        <button class="dt-button create-new btn btn-primary" type="button">
                            <span>
                                <i class="bx bx-plus me-sm-2"></i>
                                <span class="d-none d-sm-inline-block">Add New Record</span>
                            </span>
                        </button>
                    </div>
                </div>


                <div class="card-body ">
                    <div class="table-responsive text-nowrap">
                        <table style="line-height: 3" id="table1" class="table table-hover table-lg">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Occupation</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>Ram</td>
                                    <td>21</td>
                                    <td>Male</td>
                                    <td>Doctor</td>
                                </tr>
                                <tr>
                                    <td>Mohan</td>
                                    <td>32</td>
                                    <td>Male</td>
                                    <td>Teacher</td>
                                </tr>
                                <tr>
                                    <td>Rani</td>
                                    <td>42</td>
                                    <td>Female</td>
                                    <td>Nurse</td>
                                </tr>
                                <tr>
                                    <td>Johan</td>
                                    <td>23</td>
                                    <td>Female</td>
                                    <td>Software Engineer</td>
                                </tr>
                                <tr>
                                    <td>Shajia</td>
                                    <td>39</td>
                                    <td>Female</td>
                                    <td>Farmer</td>
                                </tr>
                                <tr>
                                    <td>Jack</td>
                                    <td>19</td>
                                    <td>Male</td>
                                    <td>Student</td>
                                </tr>
                                <tr>
                                    <td>Hina</td>
                                    <td>30</td>
                                    <td>Female</td>
                                    <td>Artist</td>
                                </tr>
                                <tr>
                                    <td>Gauhar</td>
                                    <td>36</td>
                                    <td>Female</td>
                                    <td>Artist</td>
                                </tr>
                                <tr>
                                    <td>Jacky</td>
                                    <td>55</td>
                                    <td>Female</td>
                                    <td>Bank Manager</td>
                                </tr>
                                <tr>
                                    <td>Pintu</td>
                                    <td>36</td>
                                    <td>Male</td>
                                    <td>Clerk</td>
                                </tr>
                                <tr>
                                    <td>Sumit</td>
                                    <td>33</td>
                                    <td>Male</td>
                                    <td>Footballer</td>
                                </tr>
                                <tr>
                                    <td>Radhu</td>
                                    <td>40</td>
                                    <td>Female</td>
                                    <td>Coder</td>
                                </tr>
                                <tr>
                                    <td>Mamta</td>
                                    <td>49</td>
                                    <td>Female</td>
                                    <td>Student</td>
                                </tr>
                                <tr>
                                    <td>Priya</td>
                                    <td>36</td>
                                    <td>Female</td>
                                    <td>Worker</td>
                                </tr>
                                <tr>
                                    <td>Johnny</td>
                                    <td>41</td>
                                    <td>Male</td>
                                    <td>Forest Officer</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Accordion -->
    <!-- <h5 class="mt-4">Accordion</h5>
              <div class="row">
                <div class="col-md mb-4 mb-md-0">
                  <small class="text-light fw-semibold">Basic Accordion</small>
                  <div class="accordion mt-3" id="accordionExample">
                    <div class="card accordion-item active">
                      <h2 class="accordion-header" id="headingOne">
                        <button
                          type="button"
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionOne"
                          aria-expanded="true"
                          aria-controls="accordionOne"
                        >
                          Accordion Item 1
                        </button>
                      </h2>

                      <div
                        id="accordionOne"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                          Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                          marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                          soufflé. Wafer gummi bears marshmallow pastry pie.
                        </div>
                      </div>
                    </div>
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionTwo"
                          aria-expanded="false"
                          aria-controls="accordionTwo"
                        >
                          Accordion Item 2
                        </button>
                      </h2>
                      <div
                        id="accordionTwo"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                          Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                          dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                          Jelly beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                        </div>
                      </div>
                    </div>
                    <div class="card accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionThree"
                          aria-expanded="false"
                          aria-controls="accordionThree"
                        >
                          Accordion Item 3
                        </button>
                      </h2>
                      <div
                        id="accordionThree"
                        class="accordion-collapse collapse"
                        aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample"
                      >
                        <div class="accordion-body">
                          Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                          gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                          dragée caramels. Ice cream wafer danish cookie caramels muffin.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md">
                  <small class="text-light fw-semibold">Accordion Without Arrow</small>
                  <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                    <div class="accordion-item card">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-1"
                          aria-controls="accordionIcon-1"
                        >
                          Accordion Item 1
                        </button>
                      </h2>

                      <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                          Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing
                          marzipan gummi bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping
                          soufflé. Wafer gummi bears marshmallow pastry pie.
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item card">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
                        <button
                          type="button"
                          class="accordion-button collapsed"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-2"
                          aria-controls="accordionIcon-2"
                        >
                          Accordion Item 2
                        </button>
                      </h2>
                      <div id="accordionIcon-2" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
                        <div class="accordion-body">
                          Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake
                          dragée ice cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies.
                          Jelly beans candy canes carrot cake. Fruitcake chocolate chupa chups.
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item card active">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconThree">
                        <button
                          type="button"
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionIcon-3"
                          aria-expanded="true"
                          aria-controls="accordionIcon-3"
                        >
                          Accordion Item 3
                        </button>
                      </h2>
                      <div
                        id="accordionIcon-3"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#accordionIcon"
                      >
                        <div class="accordion-body">
                          Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon
                          gingerbread marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake
                          dragée caramels. Ice cream wafer danish cookie caramels muffin.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
    <!--/ Accordion -->

    <!--/ Advance Styling Options -->
</div>
@endsection