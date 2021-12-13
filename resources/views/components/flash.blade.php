{{-- ვამოწმებთ თუ სესიაშ გვაქვს შენახული საქსეს ტოკენი გამოგვაქვს ვიზუალურად და შემდგომ 5 წამის შემდეგ გაქრება --}}
@if (session()->has('success'))
    <div x-data="{ show:true }" x-init='setTimeout( () => show = false, 4000)' x-show="show">
        <p class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"> {{ session('success') }}
        </p>
    </div>
@endif
