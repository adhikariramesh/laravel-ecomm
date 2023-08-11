<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" id="form-data">
                <div class="modal-body">
                    <div class="col-12 my-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="col-12 my-2">
                        <label for="name">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control">
                    </div>
                    <div class="col-12 my-2">
                        <label for="name">Select Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">select Category</option>
                            @foreach ($category as $categoryItem)
                                <option  value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 my-2">
                        <label for="name">Status</label>
                        <input type="checkbox" name="status" id="status">
                        <span>check=Hidden & uncheck=visiable</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success submit-form" style="background:green"
                        id="create_new">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>



