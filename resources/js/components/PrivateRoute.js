import React from "react";
import { Route, Redirect, useLocation } from "react-router-dom";
//import { useSelector } from "react-redux";
import { isLoggedIn } from "../services/auth";

const PrivateRoute = ({ children, ...rest }) => {
    const destination = useLocation();

    return (
        <Route
            {...rest}
            render={({ location }) => {
                if (isLoggedIn() !== null)
                    return children;
                else

                    return (
                        <Redirect
                            to={{
                                pathname: `/auth/login`,
                                state: { from: location },
                            }}
                        />
                    );
            }}
        />
    );
};

export default PrivateRoute;
