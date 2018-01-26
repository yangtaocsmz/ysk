import request from '@/utils/request'

export function login(username, password) {
  return request({
    url: '/user/login',
    method: 'get',
    params: {
      username,
      password
    }
  })
}

export function checkUserName(username) {
  return request({
    url: '/user/checkUserName',
    method: 'post',
    data: {
      username
    }
  })
}
export function getInfo(token) {
  return request({
    url: '/user/userInfo',
    method: 'get',
    params: { token }
  })
}

export function logout() {
  return request({
    url: '/user/logout',
    method: 'post'
  })
}
