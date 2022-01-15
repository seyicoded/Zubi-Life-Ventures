<?php
    // it was either core php this, or blade php then go back to all controller route caller and adding an array of stdclass.. so guess😅
    // $a_id = base64_decode($_COOKIE[sha1('admin_id')]);
    // $admin_data = (DB::select('select * from admins where a_id = ?', [$a_id])[0]) ;

    $num_worker = count(DB::select('SELECT * from admins where a_status = ? AND role = 2', [1]));
    $num_category = count(DB::select('SELECT * from category where status = ?', [1]));
    $num_investments = count(DB::select('SELECT * from packages where status = ?', [1]));
    $num_investors = count(DB::select('SELECT * from investors where i_status = ?', [1]));
    $num_active_ongoing_investment = count(DB::select('SELECT * from investors_packages_linker where status = ?', [1]));
    $num_total_engaged_investment = count(DB::select('SELECT * from investors_packages_linker where status >= ?', [1]));
?>

@extends('admin.layout.app')
@section('content')
    <div>
        <div class="row">
            <div class="col-4">
              <section class="part p-2">
                <a>
                  <div class="flexit space-between">
                    <div>
                      <p class="base-text mb-3">Workers</p>
                      <h5 class="heading-five">{{number_format($num_worker)}}</h5>
                    </div>
                    <svg width="50" height="50" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="35" cy="35" r="35" fill="#E9EBEB"/>
                      <path d="M42.5 48.5V45.5C42.5 43.9087 41.8679 42.3826 40.7426 41.2574C39.6174 40.1321 38.0913 39.5 36.5 39.5H24.5C22.9087 39.5 21.3826 40.1321 20.2574 41.2574C19.1321 42.3826 18.5 43.9087 18.5 45.5V48.5" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M30.5 33.5C33.8137 33.5 36.5 30.8137 36.5 27.5C36.5 24.1863 33.8137 21.5 30.5 21.5C27.1863 21.5 24.5 24.1863 24.5 27.5C24.5 30.8137 27.1863 33.5 30.5 33.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M51.5 48.4999V45.4999C51.499 44.1705 51.0565 42.8791 50.242 41.8284C49.4276 40.7777 48.2872 40.0273 47 39.6949" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M41 21.6949C42.2906 22.0254 43.4346 22.776 44.2515 23.8284C45.0684 24.8808 45.5118 26.1752 45.5118 27.5074C45.5118 28.8397 45.0684 30.1341 44.2515 31.1865C43.4346 32.2389 42.2906 32.9895 41 33.3199" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                  </div>
                </a>
              </section>
            </div>
            <div class="col-4">
              <section class="part p-2">
                <a>
                <div class="flexit space-between">
                  <div>
                    <p class="base-text mb-3">Category|Group</p>
                    <h5 class="heading-five">{{number_format($num_category)}}</h5>
                  </div>
                  <svg width="50" height="50" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="35" cy="35" r="35" fill="#E9EBEB"/>
                    <path d="M42.5 48.5V45.5C42.5 43.9087 41.8679 42.3826 40.7426 41.2574C39.6174 40.1321 38.0913 39.5 36.5 39.5H24.5C22.9087 39.5 21.3826 40.1321 20.2574 41.2574C19.1321 42.3826 18.5 43.9087 18.5 45.5V48.5" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M30.5 33.5C33.8137 33.5 36.5 30.8137 36.5 27.5C36.5 24.1863 33.8137 21.5 30.5 21.5C27.1863 21.5 24.5 24.1863 24.5 27.5C24.5 30.8137 27.1863 33.5 30.5 33.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M51.5 48.4999V45.4999C51.499 44.1705 51.0565 42.8791 50.242 41.8284C49.4276 40.7777 48.2872 40.0273 47 39.6949" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M41 21.6949C42.2906 22.0254 43.4346 22.776 44.2515 23.8284C45.0684 24.8808 45.5118 26.1752 45.5118 27.5074C45.5118 28.8397 45.0684 30.1341 44.2515 31.1865C43.4346 32.2389 42.2906 32.9895 41 33.3199" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
              </a>
              </section>
            </div>
            <div class="col-4">
              <section class="part p-2">
                <a >
                  <div class="flexit space-between">
                    <div>
                      <p class="base-text mb-3">Site Available Investments</p>
                      <h5 class="heading-five">{{number_format($num_investments)}}</h5>
                    </div>
                    <svg width="50" height="50" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="35" cy="35" r="35" fill="#E9EBEB"/>
                      <path d="M32 21.5H21.5V32H32V21.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M48.5 21.5H38V32H48.5V21.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M48.5 38H38V48.5H48.5V38Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M32 38H21.5V48.5H32V38Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>

                  </div>
                </a>
              </section>
            </div>
            <div class="col-4">
                <section class="part p-2">
                  <a >
                    <div class="flexit space-between">
                      <div>
                        <p class="base-text mb-3">Investors</p>
                        <h5 class="heading-five">{{number_format($num_investors)}}</h5>
                      </div>
                      <svg width="50" height="50" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="35" cy="35" r="35" fill="#E9EBEB"/>
                        <path d="M32 21.5H21.5V32H32V21.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M48.5 21.5H38V32H48.5V21.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M48.5 38H38V48.5H48.5V38Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M32 38H21.5V48.5H32V38Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                  </a>
                </section>
              </div>
              <div class="col-4">
                <section class="part p-2">
                  <a >
                    <div class="flexit space-between">
                      <div>
                        <p class="base-text mb-3">Active On-Going Investments</p>
                        <h5 class="heading-five">{{number_format($num_active_ongoing_investment)}}</h5>
                      </div>
                      <svg width="50" height="50" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="35" cy="35" r="35" fill="#E9EBEB"/>
                        <path d="M32 21.5H21.5V32H32V21.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M48.5 21.5H38V32H48.5V21.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M48.5 38H38V48.5H48.5V38Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M32 38H21.5V48.5H32V38Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                  </a>
                </section>
              </div>
              <div class="col-4">
                <section class="part p-2">
                  <a >
                    <div class="flexit space-between">
                      <div>
                        <p class="base-text mb-3">Total Investments Enaged</p>
                        <h5 class="heading-five">{{number_format($num_total_engaged_investment)}}</h5>
                      </div>
                      <svg width="50" height="50" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="35" cy="35" r="35" fill="#E9EBEB"/>
                        <path d="M32 21.5H21.5V32H32V21.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M48.5 21.5H38V32H48.5V21.5Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M48.5 38H38V48.5H48.5V38Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M32 38H21.5V48.5H32V38Z" stroke="#263238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                  </a>
                </section>
              </div>

          </div>
    </div>
@endsection
