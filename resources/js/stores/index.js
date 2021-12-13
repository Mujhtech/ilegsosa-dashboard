import { combineReducers, createStore } from "redux";
import { userReducer } from "./user";

const reducers = combineReducers({
    user: userReducer,
});

export const store = createStore(
    reducers,
    {},
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);
