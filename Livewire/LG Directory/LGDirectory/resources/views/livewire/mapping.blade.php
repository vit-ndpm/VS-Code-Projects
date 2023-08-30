<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mapping Section</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">State</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" wire:model='stateCode'>
                                    <option selected>Choose your State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state['stateCode'] }}">{{ $state['stateNameEnglish'] }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group mb-3"wire:ignore.self>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">District</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" wire:model='districtCode'>
                                    <option selected>Choose your District</option>
                                    @isset($districts)
                                        @foreach ($districts as $district)
                                            <option value="{{ $district['districtCode'] }}">
                                                {{ $district['districtNameEnglish'] }}({{ $district['districtNameLocal'] }})
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                        </div>

                        {{-- <div class="col-md-3">
                            <div class="input-group mb-3"wire:ignore.self>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Tehsil</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" wire:model='subdistrictCode'>
                                    <option selected>Choose your Tehsil</option>
                                    @isset($tehsils)
                                        @foreach ($tehsils as $tehsil)
                                            <option value="{{ $tehsil['subdistrictCode'] }}">
                                                {{ $tehsil['subdistrictNameEnglish'] }}({{ $tehsil['subdistrictNameLocal'] }})
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                        </div> --}}
                        <div class="col-md-1">
                            <div class="row">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" name="areaType" wire:model='areaType' value="0">
                                    <label class="form-check-label" for="areaType">
                                        Rural
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" name="areaType" wire:model='areaType' value="1">
                                    <label class="form-check-label" for="areaType">
                                        Urban
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="input-group mb-3"wire:ignore.self>
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Village</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" wire:model='villageCode'>
                                    <option selected>Choose your Village</option>
                                    @isset($villages)
                                        @foreach ($villages as $village)
                                            <option value="{{ $village['villageCode'] }}">
                                                {{ $village['villageNameEnglish'] }}({{ $village['villageNameLocal'] }})
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                        </div> --}}
                    </div>
                </div>


                @if ($areaType == '0')
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Rural Local Body
                                </div>
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-md-3">
                                            <div class="input-group mb-3"wire:ignore.self>
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text"
                                                        for="inputGroupSelect01">Block</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01"
                                                    wire:model='blockCode'>
                                                    <option selected>Choose your Block</option>
                                                    @isset($blocks)
                                                        @foreach ($blocks as $block)
                                                            <option value="{{ $block['blockCode'] }}">
                                                                {{ $block['blockNameEnglish'] }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-3"wire:ignore.self>
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Gram
                                                        Panchayat</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01"
                                                    wire:model='localBodyCode'>
                                                    <option selected>Choose Gram Panchayat</option>
                                                    @isset($gps)
                                                        @foreach ($gps as $gp)
                                                            <option value="{{ $gp['localBodyCode'] }}">
                                                                {{ $gp['localBodyNameEnglish'] }}({{ $gp['localBodyCode'] }})
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Urban Local Body
                                </div>
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-md-3">
                                            <div class="input-group mb-3"wire:ignore.self>
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Local
                                                        Body</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01"
                                                    wire:model='localBodyCode'>
                                                    <option selected>Choose your Local Body</option>
                                                    @isset($localBodies)
                                                        @foreach ($localBodies as $localBody)
                                                            <option value="{{ $localBody['localBodyCode'] }}">
                                                                {{ $localBody['localBodyNameEnglish'] }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-3"wire:ignore.self>
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text"
                                                        for="inputGroupSelect01">Ward</label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01"
                                                    wire:model='wardCode'>
                                                    <option selected>Choose your Ward</option>
                                                    @isset($wards)
                                                        @foreach ($wards as $ward)
                                                            <option value="{{ $ward['wardCode'] }}">
                                                                {{ $ward['wardNumber'] }}-{{ $ward['wardNameEnglish'] }}
                                                            </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @isset($villageDetails)
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    Detail of Selected Village
                                </div>
                                <div class="card-body">
                                    <p>
                                        State: {{ $villageDetails['stateMini']['stateNameEnglish'] }}(
                                        {{ $villageDetails['stateMini']['stateCode'] }})
                                    </p>
                                    <p>
                                        District: {{ $villageDetails['districtMini']['districtNameEnglish'] }}(
                                        {{ $villageDetails['districtMini']['districtCode'] }})
                                    </p>
                                    <p>
                                        Tehsil: {{ $villageDetails['subdistrictMini']['subdistrictNameEnglish'] }}(
                                        {{ $villageDetails['subdistrictMini']['subdistrictCode'] }})
                                    </p>
                                    <p>
                                        Block: {{ $villageDetails['blockMini']['blockNameEnglish'] }}(
                                        {{ $villageDetails['blockMini']['blockCode'] }})
                                    </p>
                                    <p>
                                        Local Body: {{ $villageDetails['localbodyMiniList'][0]['localbodyNameEnglish'] }}(
                                        {{ $villageDetails['localbodyMiniList'][0]['localbodyCode'] }})
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </div>
</div>
