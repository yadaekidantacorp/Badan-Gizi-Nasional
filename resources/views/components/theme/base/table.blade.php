@props([
    'border' => false,
    'rowBordered' => false,
    'rowDashed' => false,
    'space' => null,
    'rounded' => false,
    'striped' => false,
    'flush' => false,
    'hover' => false
])

@php
$border = $border ? 'table-bordered' : '';
$rowBordered = $rowBordered ? 'table-row-bordered' : '';
$rowDashed = $rowDashed ? 'table-row-dashed' : '';
$space = $space ? 'gs-'. $space . ' gy-'. $space . ' gx-'. $space : '';
$rounded = ($rounded ?? false) ? 'table-rounded' : '';
$striped = ($striped ?? false) ? 'table-striped' : '';
$flush = ($flush ?? false) ? 'table-flush' : '';
$hover = ($hover ?? false) ? 'table-hover' : '';
$classes = 'table '. $rowBordered . ' ' . $rowDashed . ' ' . $border . ' ' . $space . ' ' . $rounded . ' ' . $striped . ' ' . $flush . ' ' . $hover;
@endphp
<div class="table-responsive">
	<table {{ $attributes->merge(['class' => $classes])}} {{ $attributes->get('class') }}>
		<thead>
			<tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
				{{ $head }}
			</tr>
		</thead>
		<tbody>
            {{ $body }}
		</tbody>
	</table>
</div>