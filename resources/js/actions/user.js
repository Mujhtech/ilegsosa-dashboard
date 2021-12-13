import { Constant } from "../constant";

export const setLogin = (user) => {
  return {
    type: Constant.SET_USER_LOGIN,
    payload: user,
  };
};

export const setProfile = (user) => {
  return {
    type: Constant.SET_USER_PROFILE,
    payload: user,
  };
};

export const setUserLogout = () => {
  return {
    type: Constant.SET_USER_LOGOUT,
    payload: {},
  };
};
