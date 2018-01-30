import request from '@/utils/request'

export function loginByUsername(username, password) {
  // const data = {
  //   username,
  //   password
  // }
  return request({
    url: '/user/login',
    method: 'get',
    params: { username, password }
  })
}
export function logout() {
  return request({
    url: '/login/logout',
    method: 'post'
  })
}
export function getUserInfo(token) {
  return request({
    url: '/user/getUserInfo',
    method: 'get',
    params: { token }
  })
}
