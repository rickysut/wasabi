@extends('layout')

@section('content')
        <!-- component -->
        <div class="flex items-center justify-center p-12">
            
            <div class="mx-auto w-full max-w-[550px] ">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success mb-4">
                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
                            <iconify-icon class="text-2xl flex-0" icon="heroicons:check-circle"></iconify-icon>
                            <p class="flex-1 font-Inter font-bold ">
                                {{ $message }} 
                            </p>

                        </div>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="     alert-danger mb-4">
                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
                            <iconify-icon class="text-2xl flex-0" icon="heroicons:check-circle"></iconify-icon>
                            <p class="flex-1 font-Inter font-bold ">
                                {{ $message }} 
                            </p>
                            
                        </div>
                    </div>
                @endif
                <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6 pt-4"> 
                        <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                            Upload File
                        </label>
                    </div>
                    <div class="space-y-8 font-[sans-serif] max-w-md mx-auto">
                        <input type="file" name="file"
                          class="w-full text-black text-lg bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded" />
                      </div>

                    <div class="py-8">
                        <button type="submit"
                            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Send File
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            setTimeout(function() {
                var alertElements = document.querySelectorAll('.alert');
                alertElements.forEach(function(element) {
                    element.style.display = 'none';
                });
            }, 3000);
        </script>
@endsection
