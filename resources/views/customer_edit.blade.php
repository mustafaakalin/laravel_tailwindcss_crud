@extends('app')

@section('content')

<h2 class="text-xl">Customer EDIT</h2>
<!-- component -->
<div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-[550px]">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <img src="/images/{{ $customer->photo }}" alt="" class="w-96">
                        <label for="photo" class="mb-3 block text-base font-medium text-[#07074D]">
                            Photo
                        </label>
                        <input type="file" name="photo" id="photo" placeholder="First Name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="Name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Name
                        </label>
                        <input type="text" name="name" id="Name" placeholder="Name" value="{{ $customer->name }}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                            Email
                        </label>
                        <input type="text" name="email" id="email" placeholder="Email" value="{{ $customer->email }}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                    Phone
                </label>
                <input type="number" name="phone" id="phone" placeholder="12013213311" minlength="0" maxlength="11" value="{{ $customer->phone }}"
                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="address" class="mb-3 block text-base font-medium text-[#07074D]">
                            address
                        </label>
                        <textarea type="text" name="address" id="address" 
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" >{{ $customer->address }}</textarea>
                    </div>
                </div>
            </div>

            <div>
                <button
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection