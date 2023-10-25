<div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Commettee Member Selection
                </div>

                <form wire:submit.prevent='saveData'>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    wire:model='name' aria-describedby="helpId" placeholder="Enter Name">
                                <small id="helpId" class="form-text text-muted">Enter Name</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="members">Select Members</label>
                                <select multiple class="form-control" name="members[]" wire:model='members'>
                                    @isset($officers)
                                        @foreach ($officers as $officer)
                                            <option value="{{ $officer->id }}">
                                                {{ $officer->id }}-{{ $officer->name }},{{ $officer->post }}
                                            </option>
                                        @endforeach
                                    @endisset

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                <div class="card-footer">



                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>members</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($list)
                                    @foreach ($list as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <ul>
                                               @foreach (explode(',',$item->members) as $mem )
                                                <li>   {{ $officer->where('id',$mem)->first()->name }}({{ $officer->where('id',$mem)->first()->post }})</li>
                                               @endforeach                                              
                                            </ul>
                                            </td>


                                        </tr>
                                    @endforeach

                                @endisset

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
