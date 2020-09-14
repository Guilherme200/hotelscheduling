<tr>
  <th sortable @click="orderBy('number', $event)">
    @lang('labels.common.number')
  </th>
  <th sortable @click="orderBy('description', $event)">
    @lang('labels.common.description')
  </th>
  <th sortable @click="orderBy('capacity', $event)">
    @lang('labels.common.capacity')
  </th>
  <th sortable @click="orderBy('hotel_id', $event)">
    @lang('labels.common.hotel')
  </th>
  <th sortable @click="orderBy('category_id', $event)">
    @lang('labels.common.category')
  </th>
  <th class="text-center">
    @lang('labels.common.actions')
  </th>
</tr>