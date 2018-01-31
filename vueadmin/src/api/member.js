import request from '@/utils/request'

export function cardList(pageIndex, pageSize, where, orderBy) {
  return request({
    url: '/cardApi/cardList',
    method: 'get',
    params: { pageIndex, pageSize, where, orderBy }
  })
}
