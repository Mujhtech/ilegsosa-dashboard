import { Constant } from "../constant";
import { isLoggedIn, getUser } from "../services/auth";

export const userInitState = {
    user: isLoggedIn() != null ? getUser() : {},
    isLoggedIn: isLoggedIn() != null ? true : false,
};
export const userReducer = (state = userInitState, { type, payload }) => {
    switch (type) {
        case Constant.SET_USER_LOGIN:
            return { ...state, user: payload, isLoggedIn: true };
        case Constant.SET_USER_PROFILE:
            return { ...state, user: payload, isLoggedIn: true };
        case Constant.SET_USER_LOGOUT:
            return { ...state, user: {}, isLoggedIn: false };
        default:
            return state;
    }
};
