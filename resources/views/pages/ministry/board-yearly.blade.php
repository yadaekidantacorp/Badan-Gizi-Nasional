<?php

use App\Models\Board;
use App\Models\BoardList;
?>
<div class="hover-scroll-x h-450px px-5">
    <div style="width: 1200px">
        <div class="row row-cols-lg-4 g-10">
            @php
            $board = Board::where('ministry_id', $this->ministry->id)->first();
            $status = $board->status_id;
            if($status == 1){
                $color = 'bg-warning';
            }
            elseif($status == 2){
                $color = 'bg-info';
            }
            elseif($status == 3){
                $color = 'bg-primary';
            }
            elseif($status == 4){
                $color = 'bg-success';
            }
            elseif($status == 5){
                $color = 'bg-danger';
            }
            @endphp
            @foreach (BoardList::where('board_id',$board->id)->limit(1)->get() as $item)
                <div class="col draggable-zone">
                    <div class="mb-9">
                        <div class="d-flex flex-stack">
                            <div class="fw-bold fs-4">
                                {{ $item->name }} <span class="fs-6 text-gray-500 ms-2">2</span>
                            </div>
                            <div>
                                <a href="javascript:;" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary">
                                    <i class="ki-outline ki-element-plus fs-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="h-3px w-100 {{$color}}"></div>
                    </div>
                    @foreach ($item->cards as $card)
                    <div class="hover-scroll-y h-500px px-5">
                        <div class="card draggable mb-6 mb-xl-9">
                            <div class="card-body">
                                <div class="d-flex flex-stack mb-3">
                                    <div class="badge badge-light draggable-handle">{{ $card->title }}</div>
                                    <div>
                                        <a href="javascript:;" class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary">
                                            <i class="ki-outline ki-element-plus fs-2"></i>
                                        </a>
                                    </div>
                                </div>
                                @foreach ($card->cardLists as $list)
                                <div class="card draggable mb-2">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <a href="#" class="fs-6 fw-bold mb-1 text-gray-900 text-hover-primary draggable-handle">{{ $list->name }}</a>
                                        </div>
                                        @if($list->description)
                                        <div class="fs-6 fw-semibold text-gray-600">
                                            <i class="ki-outline ki-text-align-left"></i>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                <div class="d-flex flex-stack flex-wrapr">
                                    <div class="symbol-group symbol-hover my-1">
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                            <img alt="Pic" src="{{asset('assets/media/avatars/300-2.jpg')}}" />
                                        </div>
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Harry Mcpherson">
                                            <img alt="Pic" src="{{asset('assets/media/avatars/300-19.jpg')}}" />
                                        </div>
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                        </div>
                                    </div>
                                    <div class="d-flex my-1">
                                        <div class="border border-dashed border-gray-300 rounded d-flex align-items-center py-2 px-3">
                                            <i class="ki-outline ki-paper-clip fs-3"></i>
                                            <span class="ms-1 fs-7 fw-bold text-gray-600">2</span>
                                        </div>
                                        <div class="border border-dashed border-gray-300 d-flex align-items-center rounded py-2 px-3 ms-3">
                                            <i class="ki-outline ki-message-text-2 fs-3"></i>
                                            <span class="ms-1 fs-7 fw-bold text-gray-600">1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>