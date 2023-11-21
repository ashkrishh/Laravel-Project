<x-layout>
    <div class="container py-4 my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-content m-b">
                        <form id="post-filter-form" action="" method="get">
                        @csrf
                            <div class="row d-flex">
                                <x-filters.user-dropdown :users="$users" />
                                <x-filters.calender name="from_date" placeholder="published from" />
                                <x-filters.calender name="to_date" placeholder="published till"/>
                                <x-filters.status-dropdown />
                                
                            </div>
                            <div class="row d-flex">
                                <x-filters.search />
                                <x-form.button id="reset">Reset</x-form.button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="widget">
                <h1 class="widget-title text-white d-inline-block mb-4">View Posts</h1>
                <table class="table table-bordered text-center text-white table-transparent postsTable">
                    <thead class="bg-dark">
                        <tr>
                            <th class="h3" scope="col">#</th>
                            <th class="h3" scope="col">Title</th>
                            <th class="h3" scope="col">Content</th>
                            <th class="h3" scope="col">Published On</th>
                            <th class="h3" scope="col">Author</th>
                            <th class="h3" scope="col">Comments</th>
                            <th class="h3" scope="col">Status</th>
                            <th class="h3" scope="col">Actions</th>
                        </tr>
                    </thead>
                </table>
                <!-- end table-style -->
            </div>
        </div>
    </div>
@include('post.comments.modal');
@include('post.scripts.general');
@include('post.scripts.calender');

</x-layout>