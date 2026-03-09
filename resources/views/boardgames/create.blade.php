<x-layout>
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow text-center">
        <h2 class="text-2xl font-semibold mb-6">Create New Boardgame</h2>

        <form action="{{ route('boardgames.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Title --}}
            <div class="flex flex-col items-center">
                <label for="title" class="form-label mb-1">Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    class="form-control w-1/2 mx-auto text-center"
                    value="{{old('title')}}"
                    required
                >
            </div>

            {{-- Price --}}
            <div class="flex flex-col items-center">
                <label for="price" class="form-label mb-1">Price</label>
                <input 
                    type="number" 
                    step="0.01" 
                    id="price" 
                    name="price" 
                    class="form-control w-1/2 mx-auto text-center"
                    value="{{old('price')}}"
                    required
                >
            </div>

            {{-- Author --}}
            <div class="flex flex-col items-center">
                <label for="author" class="form-label mb-1">Author</label>
                <input 
                    type="text" 
                    id="author" 
                    name="author" 
                    class="form-control w-1/2 mx-auto text-center"
                    value="{{old('author')}}"
                    required
                >
            </div>

            {{-- URL --}}
            <div class="flex flex-col items-center">
                <label for="url" class="form-label mb-1">URL</label>
                <input 
                    type="url" 
                    id="url" 
                    name="url" 
                    class="form-control w-1/2 mx-auto text-center"
                    value="{{old('url')}}"
                    required
                >
            </div>

            {{-- Status --}}
            <div class="flex flex-col items-center">
                <label for="status" class="form-label mb-1">Status</label>
                <select 
                    id="status" 
                    name="status" 
                    class="form-select w-1/2 mx-auto text-center"
                    required
                >
                    <option value="active" 
                        {{ old('status') === 'active' ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="out_of_stock" 
                        {{ old('status') === 'out_of_stock' ? 'selected' : '' }}>
                        Out of Stock
                    </option>

                    <option value="discontinued" 
                        {{ old('status') === 'discontinued' ? 'selected' : '' }}>
                        Discontinued
                    </option>
                </select>
            </div>

            {{-- Availability --}}
            <div class="flex flex-col items-center">
                <label for="availability" class="form-label mb-1">Availability</label>
                <input 
                    type="number" 
                    id="availabilityYN" 
                    name="availabilityYN" 
                    class="form-control w-1/2 mx-auto text-center"
                    value="{{old('availabilityYN')}}"
                    required
                >
            </div>

            {{-- Learning Classes --}}
            <div class="flex flex-col items-center">
                <label for="learning_class_id" class="form-label mb-1">Learning Classes</label>
                <select 
                    id="learning_class_id" 
                    name="learning_class_id" 
                    class="form-select w-1/2 mx-auto text-center"
                >
                    <option value="" selected>— None —</option>
                    @foreach ($learningClasses as $class)
                        <option value="{{ $class->id }}" {{ old('learning_class_id') == $class->id ? 'selected' : '' }}>
                            {{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Submit --}}
            <div class="flex justify-center">
                <button type="submit" class="btn btn-primary w-1/2">
                    Create Boardgame
                </button>
            </div>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="mt-4 !bg-red-100 border !border-red-300 !text-red-800 p-4 rounded">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</x-layout>