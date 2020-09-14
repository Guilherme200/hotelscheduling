<tr>
  <th sortable @click="orderBy('name', $event)">
    @lang('labels.common.name')
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