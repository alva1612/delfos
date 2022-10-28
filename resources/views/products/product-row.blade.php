<tr
    class='break-inside relative overflow-hidden justify-between space-y-3 text-sm rounded-xl min-w-[280px]
    w-full p-4 bg-white text-black dark:bg-slate-800 dark:text-white border border-slate-700 product-data'>
    <td class='flex items-center justify-start font-medium uppercase text-xl text-green-300 text-center flex justify-center'>
        {{$product->get_Id()}}
    </td>
    <td class='items-center space-x-3 text-lg font-medium'>
        {{ $product->getName()}}
    </td>
    <td class="text-lg font-medium">
        {{ $product -> getSlug()}}
    </td>
</tr>
