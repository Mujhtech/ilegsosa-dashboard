import React from "react";
import { Route, Redirect, useLocation } from "react-router-dom";
//import { useSelector } from "react-redux";
import { isLoggedIn } from "../services/auth";

const GuestRoute = ({ children, ...rest }) => {
  //const user = useSelector((state) => state.user);

  const { pathname } = useLocation();
  //console.log(pathname);

  return (
    <Route
      {...rest}
      render={({ location }) => {
        if (isLoggedIn() === null) return children;
        else if (
          isLoggedIn() !== null &&
          (pathname === "/auth/login" || pathname === "/auth/register")
        )
          return (
            <Redirect
              to={{
                pathname: "/",
                state: { from: location },
              }}
            />
          );
        else return children;
      }}
    />
  );
};

export default GuestRoute;
