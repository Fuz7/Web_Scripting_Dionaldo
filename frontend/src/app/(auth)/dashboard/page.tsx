"use client";

import { useAuth } from "@/hooks/auth";

export default function Home() {
  const { logout,user } = useAuth();
  console.log(user)
  return (
    <>
      <div className="text-5xl">Welcome</div>
      <button
        onClick={() => {
          logout();
        }}
      >
        {" "}
        Logout
      </button>
    </>
  );
}
